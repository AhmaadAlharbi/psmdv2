<div class="my-2">
    <label for="ssname" class="form-label">Station</label>
    <input list="ssnames" wire:change="getVoltage" class="form-control col-8 mx-sm-3 mb-2" value=""
        wire:model="selectedStation" name="station_code" id="ssname" onchange="getStation()" type="search">
    <datalist id="ssnames">
        @foreach ($stations as $station)
        <option value="{{ $station->SSNAME }}">
            @endforeach
    </datalist>

    @isset($selectedStation)
    <div class="col-12">
        <label for="voltage" class="form-label">Voltage</label>
        <select name="voltage" wire:model="selectedVoltage" wire:change="getEquip"
            class="form-control col-8 mx-sm-3 mb-2" id="voltage">
            <option>Please select Voltage</option>
            @foreach($voltage as $v)
            <option value="{{$v}}">{{$v}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-12">
        <label for="equip" class="form-label">Equip</label>
        <select name="equip" class="form-control col-8 mx-sm-3 mb-2" id="equip">
            <option>Please select Equip</option>
            @foreach($equip as $item)
            <option value="{{$item->equip_number}}">{{$item->equip_number}}</option>
            @endforeach
        </select>
    </div>
    @endisset
</div>