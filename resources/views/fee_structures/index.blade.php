
@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4 no-print">
        <div>
            <h3 class="fw-bold text-primary">Fee Structures</h3>
            <p class="text-muted">Manage course fees by semester and academic year.</p>
        </div>

        <div class="d-flex gap-2">
            <button onclick="window.print()" class="btn btn-outline-dark">
                <i class="bi bi-printer"></i> Print
            </button>

            <a href="{{ route('fee-structures.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add Fee Structure
            </a>
        </div>
    </div>

    <div class="print-heading mb-4">
        <h2 class="text-center fw-bold">STUDENT MANAGEMENT SYSTEM</h2>
        <h4 class="text-center">FEE STRUCTURES REPORT</h4>
        <p class="text-center">Generated on: {{ now()->format('d M Y') }}</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success no-print">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Course</th>
                            <th>Semester</th>
                            <th>Academic Year</th>
                            <th>Amount (KSh)</th>
                            <th class="no-print">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($feeStructures as $feeStructure)
                            <tr>
                                <td>{{ $feeStructures->firstItem() + $loop->index }}</td>
                                <td>{{ $feeStructure->course->name }}</td>
                                <td>{{ $feeStructure->semester->name }}</td>
                                <td>{{ $feeStructure->academicYear->name }}</td>
                                <td class="fw-bold">
                                    {{ number_format($feeStructure->amount, 2) }}
                                </td>

                                <td class="no-print">
                                    <a href="{{ route('fee-structures.show', $feeStructure->id) }}"
                                       class="btn btn-sm btn-info text-white">
                                        View
                                    </a>

                                    <a href="{{ route('fee-structures.edit', $feeStructure->id) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('fee-structures.destroy', $feeStructure->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this fee structure?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    No fee structures found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <div class="mt-3 no-print">
                {{ $feeStructures->links() }}
            </div>

        </div>
    </div>

</div>

<style>
    .print-heading {
        display: none;
    }

    @media print {
        .no-print {
            display: none !important;
        }

        .print-heading {
            display: block !important;
        }

        body {
            background: white !important;
        }

        .card {
            box-shadow: none !important;
            border: none !important;
        }

        table {
            width: 100% !important;
        }
    }
</style>

@endsection
