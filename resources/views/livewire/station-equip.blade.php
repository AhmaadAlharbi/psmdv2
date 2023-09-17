<div class=" my-2">

    <label for="">المحطة</label>
    <input list="ssnames" wire:change="getVoltage" class="col-8 mx-sm-3 mb-2 form-control" value=""
        wire:model="selectedStation" name="station_code" id="ssname" onchange="getStation()" type="search">
    <datalist id="ssnames">
        @foreach ($stations as $station)
        <option value="{{ $station->SSNAME }}">
            @endforeach
    </datalist>

    @isset($selectedStation)
    <div class="col-12">
        <label for="">Voltage</label>
        <select name="voltage" wire:model="selectedVoltage" wire:change="getEquip"
            class="col-8 mx-sm-3 mb-2 form-control" name="equip_name" id="">
            <option>Please select Voltage</option>
            @foreach($voltage as $v)
            <option value="{{$v}}">{{$v}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-12">
        <label for="">Equip </label>

        <select name="equip" wire:model="selectedEquip" class="col-8 mx-sm-3 mb-2 form-control" name="" id="">
            <option>Please select Equip</option>

            @foreach($equip as $item)
            <option value="{{$item->equip_number}} - {{$item->equip_name}}">{{$item->equip_number}} -
                {{$item->equip_name}}</option>
            @endforeach

        </select>
    </div>
    @endisset
</div>