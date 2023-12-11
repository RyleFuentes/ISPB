<!-- Modal -->
<div wire:ignore.self class="modal fade" id="generateProductReport" tabindex="-1" aria-labelledby="generateProductReportLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            @include('livewire.messages.message')
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addProductLabel">Generate Report</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form wire:submit.prevent='generateProductPdf'>
                {{-- <div class="form-check">
                    <input wire:model="showCancelled" class="form-check-input" type="checkbox" id="cancelledCheckbox">
                    <label class="form-check-label" for="cancelledCheckbox">Cancelled</label>
                </div>

                <div class="form-check">
                    <input wire:model="showCompleted" class="form-check-input" type="checkbox" id="completedCheckbox">
                    <label class="form-check-label" for="completedCheckbox">Completed</label>
                </div> --}}

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Generate PDF</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>


            </div>

        </div>
    </div>
</div>
