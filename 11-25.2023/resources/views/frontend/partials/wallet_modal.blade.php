<div class="modal fade" id="wallet_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ translate('Recharge Wallet') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body gry-bg px-3 pt-3" style="overflow-y: inherit;">
                <form class="" action="{{ route('wallet.recharge') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label>{{ translate('Amount') }} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" lang="en" class="form-control mb-3 rounded-0" name="amount"
                                placeholder="{{ translate('Amount') }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>{{ translate('Bank Name') }} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <select class="form-control selectpicker rounded-0" name="bank_name">
                                    <option value="Saudi Investment Bank" {{old('bank_name') == 'Saudi Investment Bank' ? 'selected' : ''}}>{{ translate('Saudi Investment Bank')}}</option>
                                    <option value="Riyad Bank" {{old('bank_name') == 'Riyad Bank' ? 'selected' : ''}}>{{ translate('Riyad Bank')}}</option>
                                    <option value="Al Rajhi Bank" {{old('bank_name') == 'Al Rajhi Bank' ? 'selected' : ''}}>{{ translate('Al Rajhi Bank')}}</option>
                                    <option value="Al Rajhi Bank" {{old('bank_name') == 'Al Rajhi Bank' ? 'selected' : ''}}>{{ translate('Arab National Bank')}}</option>
                                    <option value="Bank AlBilad" {{old('bank_name') == 'Bank AlBilad' ? 'selected' : ''}}>{{ translate('Bank AlBilad')}}</option>
                                    <option value="Saudi National Bank" {{old('bank_name') == 'Saudi National Bank' ? 'selected' : ''}}>{{ translate('Saudi National Bank')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>{{ translate('Bank Deposit Slip') }} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="file" class="form-control mb-3" name="deposit_slip" required />
                        </div>
                    </div>
                  
                    <div class="form-group text-right">
                        <button type="submit"
                            class="btn btn-sm btn-primary rounded-0 transition-3d-hover mr-1">{{ translate('Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>