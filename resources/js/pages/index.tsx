import { Link } from "@inertiajs/react";

export default function Index() {
  return (
    <div className="flex justify-center items-center h-screen flex-col gap-2">
      <h1>Index page</h1>
      <Link href="/qrcode" className="text-blue-400 underline text-3xl">Go to Qr Code Listings</Link>
    </div>
  );
}
