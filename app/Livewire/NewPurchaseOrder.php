<?php

namespace App\Livewire;

use App\Models\Vendor;
use Livewire\Component;

class NewPurchaseOrder extends Component
{
    # Property for the Selected Vendor #
    public $selectedVendor = 0;

    // Vendor Properties
    public $vendorCode;
    public $vendorName;
    public $vendorCity;
    public $vendorAddress;
    public $vendorContact;
    public $vendorEmail;


    #-----------------------------------------------#
    #                   Events                      #
    #-----------------------------------------------#
    public function getSelectedVendor()
    {
        $vendor = Vendor::find($this->selectedVendor);

        $this->vendorCode = $vendor->code;
        $this->vendorName = $vendor->name;
        $this->vendorCity = $vendor->city;
        $this->vendorAddress = $vendor->address;
        $this->vendorContact = $vendor->contact;
        $this->vendorEmail = $vendor->email;
    }
    #-----------------------------------------------#
    #                 Render Method                 #
    #-----------------------------------------------#
    public function render()
    {
        return view('livewire.new-purchase-order', [
            'vendors' => Vendor::all(['id', 'name'])
        ]);
    }
}
