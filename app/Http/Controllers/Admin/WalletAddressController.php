<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WalletAddress;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WalletAddressController extends Controller
{
    /**
     * List every wallet address and render the add/edit management page.
     */
    public function index()
    {
        $wallets = WalletAddress::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.wallet-addresses', compact('wallets'));
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);

        WalletAddress::create($validated);

        return redirect()
            ->route('admin.wallet-addresses.index')
            ->with('success', 'Wallet address added successfully.');
    }

    public function update(Request $request, WalletAddress $walletAddress)
    {
        $validated = $this->validated($request, $walletAddress);

        $walletAddress->update($validated);

        return redirect()
            ->route('admin.wallet-addresses.index')
            ->with('success', 'Wallet address updated successfully.');
    }

    public function destroy(WalletAddress $walletAddress)
    {
        $walletAddress->delete();

        return redirect()
            ->route('admin.wallet-addresses.index')
            ->with('success', 'Wallet address removed.');
    }

    /**
     * Shared validation for create/update.
     */
    private function validated(Request $request, ?WalletAddress $wallet = null): array
    {
        $validated = $request->validate([
            'coin' => [
                'required', 'string', 'max:20',
                Rule::unique('wallet_addresses', 'coin')->ignore($wallet?->id),
            ],
            'label' => ['required', 'string', 'max:255'],
            'network' => ['nullable', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'logo' => ['nullable', 'string', 'max:255'],
            'color' => ['nullable', 'string', 'max:20'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:9999'],
        ]);

        $validated['coin'] = strtoupper(trim($validated['coin']));
        $validated['is_active'] = $request->boolean('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        return $validated;
    }
}
