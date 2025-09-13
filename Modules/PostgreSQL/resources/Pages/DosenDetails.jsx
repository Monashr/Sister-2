import React from "react";

import { Head, Link, router, usePage } from "@inertiajs/react";

import Dashboard from "@/layout/Dashboard";

import { Pencil, ChevronLeft, Trash } from "lucide-react";

import { Card } from "@/components/ui/card";

import { Button } from "@/components/ui/button";

import { formatDateNoHour } from "@/components/lib/utils";

function DosenDetails() {
  const { dosen } = usePage().props;

  return (
    <>
      <Head title={dosen.nama} />
      <div className="space-y-4">
        <Card className="border-border">
          <div className="grid grid-cols-1 sm:flex sm:justify-between items-center px-6 py-2 gap-4">
            <div className="flex items-center gap-4 m-0 p-0 w-full justify-center sm:justify-start ">
              <h1 className="flex font-bold text-2xl text-primary bg-accent items-center justify-center rounded-2xl w-10 h-10">
                {dosen.nama?.charAt(0) || "A"}
              </h1>
              <div>
                <h1 className="flex items-center h-full m-0 p-0 font-bold text-2xl md:text-2xl">
                  {dosen.nama}
                </h1>
              </div>
            </div>
            <div className="grid grid-cols-1 gap-2 sm:flex">
              <Link href="/postgresql/dosen">
                <Button className="cursor-pointer">
                  <ChevronLeft className="w-4 h-4" />
                  Back
                </Button>
              </Link>
              <Link href={`/postgresql/dosen/edit/${dosen.id}`}>
                <Button variant="outline" className="cursor-pointer border-border">
                  <Pencil className="w-4 h-4" />
                  Edit
                </Button>
              </Link>
              <Button
                variant="destructive"
                className="cursor-pointer"
                onClick={() => {
                  if (
                    confirm("Are you sure you want to delete this Dosen?")
                  ) {
                    router.delete(`/postgresql/dosen/${dosen.id}`);
                  }
                }}
              >
                <Trash className="w-4 h-4" />
                Delete
              </Button>
            </div>
          </div>
        </Card>
        <Card className="p-6 px-8 border-border">
          <div className="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 px-2">
            <Detail label="NIP" value={dosen.nip} />

            <Detail label="Nama" value={dosen.nama} />

            <Detail label="Alamat" value={dosen.alamat} />

            <Detail
              label="Created At"
              value={formatDateNoHour(dosen.created_at)}
            />

            <Detail
              label="Last Updated At"
              value={formatDateNoHour(dosen.updated_at)}
            />
          </div>
        </Card>
      </div>
    </>
  );
}

const Detail = ({ label, value }) => (
  <div className="space-y-2">
    <p className="text-sm font-medium text-muted-foreground">{label}</p>
    <p className="text-base font-semibold text-foreground">{value ?? "-"}</p>
  </div>
);

DosenDetails.layout = (page) => <Dashboard children={page} />;

export default DosenDetails;
