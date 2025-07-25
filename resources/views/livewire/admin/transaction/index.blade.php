<div class="container-fluid">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>List Transaksi</h1>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="transactionTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>Nomer Telepon</th>
                                <th>Nama Kelas</th>
                                <th>Harga Kelas</th>
                                <th>Pembelian</th>
                                <th>Bukti Transfer</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $i => $transaction)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $transaction->user->name }}</td>
                                    <td>{{ $transaction->user->phone }}</td>
                                    <td>{{ $transaction->class->name }}</td>
                                    <td>Rp {{ format_rupiah($transaction->class->price) }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td><a href="{{ $transaction->bukti_transfer_url }}" target="_blank">Lihat bukti</a>
                                    </td>
                                    <td>
                                        @if ($transaction->is_accepted == 2)
                                            <span class="text-danger fw-bold">Berhenti</span>
                                        @else
                                            <button wire:click="accClass({{ $transaction->id }})"
                                                class="btn btn-sm btn-{{ $transaction->is_accepted != 1 ? 'success' : 'secondary disabled' }}">{{ $transaction->is_accepted != 1 ? 'Terima' : 'Selesai' }}</button>
                                        @endif
                                        @if ($transaction->is_accepted == 1)
                                            <button wire:click="cancelClass({{ $transaction->id }})"
                                                class="btn btn-sm btn-danger">Berhenti</button>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#transactionTable').DataTable();
        });
    </script>
@endpush
