@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{url('assets/images/logo.png')}}" class="logo" alt="Migtours">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
