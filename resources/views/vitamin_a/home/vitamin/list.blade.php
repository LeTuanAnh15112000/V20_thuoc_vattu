<table class="table table-head-fixed table-hover text-nowrap">
    <thead>
        <tr>
            <th>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="checkAll">
                    <label for="checkAll" class="custom-control-label"></label>
                </div>
            </th>
            <th>STT</th>
            <th>tên vitamin</th>
            <th>số lượng</th>
            <th>ngày nhập</th>
        </tr>
    </thead>
    <tbody id="vitaminList">
        @php
            $i = 1;
        @endphp
        @foreach ($vitamins as $vitamin)
            <tr>
                <td>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="{{ 'check'.$vitamin->id }}">
                        <label for="{{ 'check'.$vitamin->id }}" class="custom-control-label"></label>
                    </div>
                </td>
                <td>{{ $i++ }}</td>
                <td>{{ $vitamin->ten_vitamin }}</td>
                <td>{{ $vitamin->so_luong }}</td>
                <td>{{ $vitamin->ngay_nhap }}</td>
            </tr>      
        @endforeach
    </tbody>
</table>