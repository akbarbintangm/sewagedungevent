<p class="font-weight-bold mb-0 text-xs">
	{{ \Illuminate\Support\Str::title(str_replace('_', ' ', $type_user)) }}
</p>
@if ($type_user === 'ADMINISTRATOR')
	<p class="text-secondary mb-0 text-xs">Tingkat Tinggi</p>
@elseif ($type_user === 'PEMILIK_GEDUNG' || $type_user === 'ADMIN_ENTRY')
	<p class="text-secondary mb-0 text-xs">Tingkat Menengah</p>
@else
	<p class="text-secondary mb-0 text-xs">Tingkat Rendah</p>
@endif
