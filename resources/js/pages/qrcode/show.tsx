export default function Show({ qrcode }: { qrcode: any }) {
  console.log(qrcode);

  return (
    <div>
      <div className="flex justify-center w-1/2 h-1/2 items-center mx-auto">
        <img src={qrcode.code} alt="Qr Code" className="w-[90%] h-[90%]" />
      </div>
    </div>
  );
}
