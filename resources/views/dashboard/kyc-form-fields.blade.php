<form action="{{ route('kyc.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    
    <!-- Requirements Notice -->
    <div class="bg-blue-50 border border-blue-200 p-4">
        <div class="flex items-start gap-3">
            <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div>
                <p class="text-sm font-semibold text-blue-800">Document Requirements:</p>
                <ul class="text-xs text-blue-700 mt-2 space-y-1">
                    <li>✓ Clear, colored image of your document</li>
                    <li>✓ All four corners must be visible</li>
                    <li>✓ No glare or reflection on the document</li>
                    <li>✓ File size must be less than 2MB</li>
                    <li>✓ Accepted formats: JPG, PNG, JPEG</li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Document Type -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Document Type <span class="text-red-500">*</span></label>
        <select name="document_type" class="w-full px-4 py-2 border border-gray-300 focus:border-red-500 focus:outline-none" required>
            <option value="">Select Document Type</option>
            <option value="passport">International Passport</option>
            <option value="drivers_license">Driver's License</option>
            <option value="national_id">National ID Card</option>
        </select>
    </div>
    
    <!-- Front Side -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Front Side of Document <span class="text-red-500">*</span></label>
        <div class="border-2 border-dashed border-gray-300 p-6 text-center hover:border-red-400 transition-colors duration-300">
            <input type="file" name="document_front" id="document_front" accept="image/jpeg,image/png,image/jpg" class="hidden" onchange="previewImage(this, 'front_preview')" required>
            <label for="document_front" class="cursor-pointer block">
                <svg class="w-10 h-10 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                </svg>
                <span class="text-sm text-gray-500">Click to upload front side</span>
                <p class="text-xs text-gray-400 mt-1">JPG, PNG or JPEG (Max 2MB)</p>
            </label>
            <div id="front_preview" class="mt-3 hidden">
                <img class="max-h-32 mx-auto border border-gray-200">
            </div>
        </div>
        @error('document_front')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    
    <!-- Back Side -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Back Side of Document <span class="text-gray-400 text-xs font-normal">(Optional if applicable)</span></label>
        <div class="border-2 border-dashed border-gray-300 p-6 text-center hover:border-red-400 transition-colors duration-300">
            <input type="file" name="document_back" id="document_back" accept="image/jpeg,image/png,image/jpg" class="hidden" onchange="previewImage(this, 'back_preview')">
            <label for="document_back" class="cursor-pointer block">
                <svg class="w-10 h-10 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                </svg>
                <span class="text-sm text-gray-500">Click to upload back side</span>
                <p class="text-xs text-gray-400 mt-1">JPG, PNG or JPEG (Max 2MB)</p>
            </label>
            <div id="back_preview" class="mt-3 hidden">
                <img class="max-h-32 mx-auto border border-gray-200">
            </div>
        </div>
        @error('document_back')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    
    <!-- Declaration -->
    <div class="bg-gray-50 p-4 border border-gray-200">
        <label class="flex items-start gap-3 cursor-pointer">
            <input type="checkbox" name="declaration" required class="mt-0.5">
            <span class="text-sm text-gray-600">I hereby confirm that the documents provided are authentic, belong to me, and the information provided is accurate and complete.</span>
        </label>
    </div>
    
    <!-- Submit Button -->
    <button type="submit" class="w-full py-3 bg-green-600 hover:bg-green-700 text-white font-semibold transition-all duration-300">
        Submit for Verification
    </button>
</form>

<script>
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        const img = preview.querySelector('img');
        const file = input.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    }
</script>