
import { Pagination } from '@/components/pagination';
import { Link } from '@inertiajs/react';

export default function Index({ qrCodes }: { qrCodes: any }) {

  console.log(qrCodes);

  return (
    <div className="p-6 space-y-6">
      <h1 className="text-2xl font-semibold">QR Code List</h1>

      <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
        {qrCodes.data.map((item: any, index: any) => (
          <Link href={`/qrcode/${item.id}`} key={index}>
            <img
              src={item.code}
              alt={`QR Code ${index}`}
              className="size-32 border border-gray-300 rounded shadow-sm"
            />
            <p>{item.id}</p>
          </Link>
        ))}
      </div>

      <Pagination links={qrCodes.links} />
    </div>
  );
}
