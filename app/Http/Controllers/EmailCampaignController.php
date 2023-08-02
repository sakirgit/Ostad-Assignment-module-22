<?php 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\EmailCampaign;

class EmailCampaignController extends Controller
{

    public function index()
    {
        $emailCampaigns = EmailCampaign::all();
        return view('emailcampaigns.list', compact('emailCampaigns'));
    }

    public function create()
    {
        $shopOwners = User::all();
        return view('emailcampaigns.create', compact('shopOwners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'content' => 'required',
            'shop_owner_id' => 'required|exists:shop_owners,id',
        ]);

        EmailCampaign::create($request->all());

        return redirect()->route('emailcampaigns.list')
            ->with('success', 'Email campaign created successfully.');
    }

    public function edit(EmailCampaign $emailCampaign)
    {
        $shopOwners = User::all();
        return view('email-campaign.edit', compact('emailCampaign', 'shopOwners'));
    }

    public function update(Request $request, EmailCampaign $emailCampaign)
    {
        $request->validate([
            'subject' => 'required',
            'content' => 'required',
            'shop_owner_id' => 'required|exists:shop_owners,id',
        ]);

        $emailCampaign->update($request->all());

        return redirect()->route('emailcampaigns.list')
            ->with('success', 'Email campaign updated successfully.');
    }

}
