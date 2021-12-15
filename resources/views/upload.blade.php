
<table>
    <tr>
        <td></td>
    </tr>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{$item}}</td>
        </tr>
        @endforeach
       
    </tbody>
</table>