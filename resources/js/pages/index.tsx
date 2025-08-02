import { Link } from '@inertiajs/react';

export default function Index() {
  return (
    <div className="flex h-screen flex-col items-center justify-center gap-2">
      <Link href="/qrcode" className="text-5xl text-blue-400 underline underline-offset-4">
        Go to Qr Code Listings
      </Link>
    </div>
  );
}
