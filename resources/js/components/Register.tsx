import { useForm } from '@inertiajs/react'

export default function Register({ qrcode }: { qrcode: string }) {
  const { data, setData, post, processing, errors } = useForm({
    name: '',
    email: '',
    phone: '',
    qrcode: qrcode,
  })

  const handleSubmit = (e: React.FormEvent<HTMLFormElement>) => {
    e.preventDefault()
    post(route('qrcode.register'))
  }

  return (
    <div className="min-h-screen flex items-center justify-center px-4">
      <form
        onSubmit={handleSubmit}
        className="p-6 rounded-xl shadow-md w-full max-w-md space-y-4"
      >
        <h2 className="text-xl font-bold text-center">Register</h2>

        <div>
          <label className="block text-sm font-medium text-gray-700">Name</label>
          <input
            type="text"
            value={data.name}
            onChange={(e) => setData('name', e.target.value)}
            className="mt-1 w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300"
          />
          {errors.name && <div className="text-sm text-red-500 mt-1">{errors.name}</div>}
        </div>

        <div>
          <label className="block text-sm font-medium text-gray-700">Email</label>
          <input
            type="email"
            value={data.email}
            onChange={(e) => setData('email', e.target.value)}
            className="mt-1 w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300"
          />
          {errors.email && <div className="text-sm text-red-500 mt-1">{errors.email}</div>}
        </div>

        <div>
          <label className="block text-sm font-medium text-gray-700">Phone</label>
          <input
            type="text"
            value={data.phone}
            onChange={(e) => setData('phone', e.target.value)}
            className="mt-1 w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300"
          />
          {errors.phone && <div className="text-sm text-red-500 mt-1">{errors.phone}</div>}
        </div>

        <button
          type="submit"
          disabled={processing}
          className="w-full bg-blue-600 py-2 rounded-md hover:bg-blue-700 transition"
        >
          {processing ? 'Submitting...' : 'Submit'}
        </button>
      </form>
    </div>
  )
}
