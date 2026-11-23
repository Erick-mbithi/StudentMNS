<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('student')
            ->latest()
            ->paginate(10);

        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $students = Student::orderBy('first_name')->get();

        return view('payments.create', compact('students'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|max:50',
            'transaction_reference' => 'nullable|string|max:100',
            'payment_date' => 'required|date',
            'status' => 'required|in:completed,pending',
        ]);

        Payment::create($validated);

        return redirect()
            ->route('payments.index')
            ->with('success', 'Payment recorded successfully.');
    }

    public function show(Payment $payment)
    {
        $payment->load('student');

        return view('payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        $students = Student::orderBy('first_name')->get();

        return view('payments.edit', compact('payment', 'students'));
    }

    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|max:50',
            'transaction_reference' => 'nullable|string|max:100',
            'payment_date' => 'required|date',
            'status' => 'required|in:completed,pending',
        ]);

        $payment->update($validated);

        return redirect()
            ->route('payments.index')
            ->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()
            ->route('payments.index')
            ->with('success', 'Payment deleted successfully.');
    }
}
