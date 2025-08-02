import { Pagination } from '@/components/pagination';
import { Link } from '@inertiajs/react';

export default function Index({ qrCodes }: { qrCodes: any }) {
    return (
        <div className="space-y-6 p-6">
            <h1 className="mb-8 text-center text-4xl font-semibold">QR Code List</h1>

            <div className="grid grid-cols-2 gap-4 py-4 md:grid-cols-4">
                {qrCodes.data.map((item: any, index: any) => (
                    <Link href={`/qrcode/${item.id}`} key={index}>
                        <img src={item.code} alt={`QR Code ${index}`} className="size-32 rounded border border-gray-300 shadow-sm" />
                        <p>{item.id}</p>
                    </Link>
                ))}
            </div>

            <Pagination links={qrCodes.links} />
        </div>
    );
}
