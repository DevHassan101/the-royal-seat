<x-app-layout>
    <div class="flex justify-between items-center w-full mb-5">
        <h2 class="text-3xl font-semibold">
            Drivers
        </h2>
        <a href="{{ route('driver.index') }}"
            class=" rounded px-[20px] py-[10px] bg-indigo-500 hover:bg-transparent  !border !border-indigo-500 text-white hover:!text-indigo-500">
            Go Back
        </a>
    </div>
    <div class="bg-white rounded p-5">
        <form action="{{ route('driver.store') }}" method="post">
            @csrf
            <div class="grid grid-cols-2 gap-x-5">
                <div class="mb-3 col-span-2">
                    <label for="name" class="capitalize mb-2">name</label>
                    <input type="text" name="name" id="name" class="block w-full !rounded" placeholder="Enter Driver Name" value="{{old('name')}}">
                    @error('name')
                        <span class="text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="capitalize mb-2">email</label>
                    <input type="email" name="email" id="email" class="block w-full !rounded" placeholder="Enter Driver Email" value="{{old('email')}}">
                    @error('email')
                        <span class="text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="capitalize mb-2">password</label>
                    <input type="password" name="password" id="password" class="block w-full !rounded" placeholder="Enter Password" value="{{old('password')}}">
                    @error('password')
                        <span class="text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="emirates_id" class="capitalize mb-2">Emirates Id</label>
                    <input type="text" name="emirates_id" id="emirates_id" class="block w-full !rounded" placeholder="Enter Emirates ID" value="{{old('emirates_id')}}">
                    @error('emirates_id')
                        <span class="text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="license_number" class="capitalize mb-2">License number</label>
                    <input type="text" name="license_number" id="license_number" class="block w-full !rounded" placeholder="Enter License Number" value="{{old('license_number')}}">
                    @error('license_number')
                        <span class="text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3 col-span-2">
                    <label for="permit_details" class="capitalize mb-2">Permit details</label>
                    <textarea name="permit_details" id="permit_details" rows="5" class="block w-full !rounded" placeholder="Enter Permit Details" value="{{old('permit_details')}}">{{old('permit_details')}}</textarea>
                    @error('permit_details')
                        <span class="text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

                <button type="submit">
                    Subimit
                </button>
        </form>
    </div>

</x-app-layout>
