export default function ShowSuccess({ success }: { success: string }) {
  return (
    <div>
      <h1 className="text-3xl font-semibold text-green-400 flex justify-center items-center h-screen">{success}</h1>
    </div>
  );
}
