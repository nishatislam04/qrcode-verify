import Register from "@/components/Register";

export default function Verify({ registered_at, code }: { registered_at: boolean, code: any }) {
  return (
    <>
      <h1>verify page</h1>
      <p>{registered_at ? 'Registered' : 'Not Registered'}</p>
      {registered_at ? (
        <p>already registered</p>
      ) : (
        <Register qrcode={code.code} />
      )}
    </>
  );
}
