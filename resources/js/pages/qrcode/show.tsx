import { Link } from "@inertiajs/react";

export default function Show({ qrcode }: { qrcode: any }) {
  console.log(qrcode);

  return (
    <div>
      <Link href="/qrcode" className="text-xl text-blue-400 underline underline-offset-4">
        Go Back
      </Link>
      <div className="flex justify-center w-1/2 h-1/2 items-center mx-auto">
        <img src={qrcode.code} alt="Qr Code" className="w-[90%] h-[90%]" />
      </div>
    </div>
  );
}
