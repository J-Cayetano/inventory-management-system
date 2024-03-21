<?php

namespace App\Livewire;

use App\Models\Vendor;
use Livewire\Component;

class VendorSelect extends Component
{
    # Property for the Selected Vendor #
    public $selectedVendor = 0;

    #-----------------------------------------------#
    #                   Events                      #
    #-----------------------------------------------#

    #-----------------------------------------------#
    #                 Render Method                 #
    #-----------------------------------------------#
    public function render()
    {
        return view('livewire.vendor-select', [
            'vendors' => Vendor::all(['id', 'name'])
        ]);
    }
}
