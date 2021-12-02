<div>
    @if (!empty($successMessage))
        <script>
            toastr() - > success('delete done successfull', 'school mangement system');
        </script>
    @endif

    @if (!empty($error))
        <script>
            alert('smoe thsig wnt worg');
        </script>
    @endif

    @if ($showparent == true)
        @include('livewire.table')
    @else
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button"
                        class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                    <p>{{ trans('site.Step1') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button"
                        class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                    <p>{{ trans('site.Step2') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button"
                        class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                        disabled="disabled">3</a>
                    <p>{{ trans('site.Step3') }}</p>
                </div>
            </div>
        </div>

        @include('livewire.Father_Form')
        @include('livewire.Mother_Form')
        <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
            @if ($currentStep != 3)
                <div style="display: none" class="row setup-content" id="step-3">
            @endif
            <div class="card offset-md-3 col-md-6 p-5 mt-5">
                <div class="col-md-12">
                    <input type='file' wire:model='photos' multiple>
                    <h3 style="font-family: 'Cairo', sans-serif;">هل انت متاكد من حفظ البيانات ؟</h3><br>
                    <button class="btn btn-danger btn nextBtn btn-lg pull-right" type="button"
                        wire:click="back(2)">{{ trans('site.Back') }}</button>
                    <button class="btn btn-success btn btn-lg pull-right" wire:click="submitForm"
                        type="button">{{ trans('site.Finish') }}</button>
                </div>
            </div>
        </div>
    @endif
</div>
