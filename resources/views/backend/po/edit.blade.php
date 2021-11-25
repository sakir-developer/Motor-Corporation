@extends('layouts.backend.app')

@section('title') Purchase Orders @endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Purchase Orders</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Purchase Orders</li>
                </ol>
                <a href="{{ route('backend.purchaseOrder.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i
                    class="fa fa-plus-circle"></i> PO List</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Edit Purchase Orders</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.purchaseOrder.update', $purchaseOrder) }}" method="POST"
                        class="form-horizontal form-material" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-body">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="vendor_name">Vendor<b class="text-danger">*</b> </label>
                                            <select class="select2 form-select form-control" id="vendor_name" name="vendor_name" required>
                                                <option selected disabled value="">Chose vendor</option>
                                                @foreach ($vendors as $vendor)
                                                <option value="{{ $vendor->id }}" @if($purchaseOrder->vendor_name == $vendor->id) selected @endif>{{ $vendor->name }}</option>
                                                @endforeach
                                              </select>
                                              </select>
                                            @error('vendor_name')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group has-danger">
                                            <label class="form-label" for="amount">Amount <b
                                                    class="text-danger">*</b></label>
                                            <input type="number" id="amount" name="amount" placeholder="Amount"
                                                class="form-control" value="{{ $purchaseOrder->amount }}" required>
                                            @error('amount')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group has-danger">
                                            <label class="form-label" for="job_finish_date">Job finish date <b
                                                    class="text-danger">*</b></label>
                                            <input type="date" id="job_finishing_date" name="job_finish_date"
                                                class="form-control" value="{{ $purchaseOrder->job_finish_date }}" required>
                                            @error('job_finish_date')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group has-danger">
                                            <label class="form-label" for="work_description">Work Description <b
                                                    class="text-danger">*</b></label>
                                            <textarea cols="30" rows="10" id="work_description" name="work_description"
                                                class="form-control" required>{{ $purchaseOrder->work_description }}</textarea>
                                            @error('work_description')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success text-white"> <i class="fa fa-check"></i>
                                        Save</button>
                                    <button type="reset" class="btn btn-danger">Reset form</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('head')

@endpush

@push('foot')

@endpush
