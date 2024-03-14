<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <form wire:submit.prevent="search">
        <div class="input-group mb-3">
            <input list="ssnames" class="form-control" wire:model="selectedStation" name="station_code" id="ssname"
                type="search">
            <datalist id="ssnames">
                @foreach ($stations as $station)
                <option value="{{ $station->SSNAME }}">
                    @endforeach
            </datalist>
            <button type="button" wire:click="clearStation" class="btn btn-danger" aria-label="Clear">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
        <button class="btn btn-warning">Add new Equip</button>

    </form>


    <div class="table-responsive">
        <table id="archive" class="border-top-0  table table-bordered text-nowrap border-bottom">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Station</th>
                    <th scope="col">Voltage</th>
                    <th scope="col">Equip number</th>
                    <th scope="col">Equip Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equip as $e)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$e->station->SSNAME}}</td>
                    <td>{{$e->voltage_level}}</td>
                    <td>{{$e->equip_number}}</td>
                    <td>{{$e->equip_name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- {{ $equip->links() }} --}}
</div>

<!-- DATA TABLE JS-->
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>

<!--Internal  Datatable js -->
<script src="{{asset('assets/js/table-data.js')}}"></script>