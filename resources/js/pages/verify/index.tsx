import Register from "@/components/Register";

export default function Verify({ registered_at, code }: { registered_at: boolean, code: any }) {
  return (
    <div className="flex h-screen flex-col items-center justify-top gap-2 mt-12">
      {registered_at ? (
        <>
          <h1 className="text-5xl text-blue-400">verify page</h1>
          <p className="text-2xl text-red-400 mt-8 uppercase">already registered</p>
        </>
      ) : (
        <Register qrcode={code.code} />
      )}
    </div>
  );
}
