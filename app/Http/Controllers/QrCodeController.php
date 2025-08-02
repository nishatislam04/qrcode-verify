<?php

namespace App\Http\Controllers;

use App\Models\QrCode as ModelsQrCode;
use chillerlan\QRCode\QRCode;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QrCodeController extends Controller
{
    public function index()
    {
        $qrCodes = ModelsQrCode::select('id', 'code')->paginate(10);

        foreach ($qrCodes as $qrCode) {
            $fullUrl = url("/verify/{$qrCode->code}");
            $qrCode->code = (new QRCode)->render($fullUrl);
        }

        return Inertia::render('qrcode/index', compact('qrCodes'));
    }

    public function show(ModelsQrCode $qrcode)
    {
        $fullUrl = url("/verify/{$qrcode->code}");
        $qrcode->code = (new QRCode)->render($fullUrl);

        return Inertia::render('qrcode/show', compact('qrcode'));
    }

    public function verify($qrcode)
    {
        $code = ModelsQrCode::where('code', $qrcode)->firstOrFail();
        $registered_at = (bool) $code->registered_at;

        return Inertia::render('verify/index', compact('registered_at', 'code'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
        ]);

        $code = ModelsQrCode::where('code', $request->qrcode)->firstOrFail();

        $code->update([
            'registered_at' => now(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // return redirect()->route('verify.showSuccess')->with('success', 'Qr Code registered successfully');
        return redirect()->route('verify.showSuccess');
    }

    public function showSuccess()
    {
        return Inertia::render('verify/showSuccess', [
            'success' => 'Qr Code registered successfully',
        ]);
    }
}
