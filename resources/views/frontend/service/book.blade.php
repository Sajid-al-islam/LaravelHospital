<x-frontend.frontend-master>

@section('content')
	
	<div class="container">
		<div class="card mt-3 mb-3">
			<table class="table">
				<thead>
					<tr>
						<th>Service Name</th>
						<th>Service Description</th>
						<th>Cost</th>
						<th>Checkout</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ $service->name }}</td>
						<td>{{ $service->description }}</td>
						<td>{{ $service->service_cost }}</td>
						<td><a href="{{ route('stripe.get', $service->id) }}" class="genric-btn primary">Proceed to checkout</a></td>
					</tr>
				</tbody>
			</table>
		</div>	
	</div>

@endsection

</x-frontend.frontend-master>