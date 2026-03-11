<x-app-layout>
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Account Profile</h2>
            <p class="text-sm text-slate-500 mt-1">Manage your personal information, security, and workspace preferences</p>
        </div>
    </div>

    <!-- Alert / Flash Messages via Alpine -->
    @if (session('status') === 'profile-updated' || session('status') === 'password-updated')
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl p-4 flex items-start justify-between">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-emerald-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                <p class="text-sm font-medium">Profile configuration was updated successfully.</p>
            </div>
            <button type="button" @click="show = false" class="text-emerald-500 hover:text-emerald-700 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
    @endif

    <div class="space-y-6 max-w-5xl">
        
        <!-- Profile Information Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="px-8 py-5 border-b border-slate-200/60 bg-slate-50 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-slate-800">Personal Information</h3>
                    <p class="text-sm text-slate-500 mt-0.5">Update your account's profile information and email address.</p>
                </div>
            </div>
            
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')
                
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Display Name</label>
                            <input type="text" id="name" name="name" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('name') border-red-500 @enderror" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                            @error('name')
                                <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Work Email</label>
                            <input type="email" id="email" name="email" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('email') border-red-500 @enderror" value="{{ old('email', $user->email) }}" required autocomplete="username">
                            @error('email')
                                <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="phone" class="block text-sm font-medium text-slate-700 mb-1">Phone Number</label>
                            <input type="text" id="phone" name="phone" class="w-full md:w-1/2 border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('phone') border-red-500 @enderror" value="{{ old('phone', $user->phone) }}" placeholder="+855 00 000 000">
                            @error('phone')
                                <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 px-8 py-5 border-t border-slate-200 flex items-center justify-end rounded-b-xl">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2.5 px-6 rounded-lg shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Save Profile
                    </button>
                </div>
            </form>
        </div>

        <!-- Update Password Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="px-8 py-5 border-b border-slate-200/60 bg-slate-50 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-slate-800">Update Password</h3>
                    <p class="text-sm text-slate-500 mt-0.5">Ensure your account is using a long, random password to stay secure.</p>
                </div>
            </div>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')
                
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-2xl">
                        <div class="md:col-span-2">
                            <label for="current_password" class="block text-sm font-medium text-slate-700 mb-1">Current Password</label>
                            <input type="password" id="current_password" name="current_password" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @if($errors->updatePassword->has('current_password')) border-red-500 @endif" autocomplete="current-password" placeholder="••••••••">
                            @if($errors->updatePassword->has('current_password'))
                                <p class="text-xs text-red-600 mt-1 font-medium">{{ $errors->updatePassword->first('current_password') }}</p>
                            @endif
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-slate-700 mb-1">New Password</label>
                            <input type="password" id="password" name="password" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @if($errors->updatePassword->has('password')) border-red-500 @endif" autocomplete="new-password" placeholder="••••••••">
                            @if($errors->updatePassword->has('password'))
                                <p class="text-xs text-red-600 mt-1 font-medium">{{ $errors->updatePassword->first('password') }}</p>
                            @endif
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @if($errors->updatePassword->has('password_confirmation')) border-red-500 @endif" autocomplete="new-password" placeholder="••••••••">
                            @if($errors->updatePassword->has('password_confirmation'))
                                <p class="text-xs text-red-600 mt-1 font-medium">{{ $errors->updatePassword->first('password_confirmation') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 px-8 py-5 border-t border-slate-200 flex items-center justify-end rounded-b-xl">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2.5 px-6 rounded-lg shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2h-1V9a5 5 0 00-10 0v2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path></svg>
                        Update Password
                    </button>
                </div>
            </form>
        </div>

        <!-- Delete Account Card -->
        <div class="bg-white rounded-xl shadow-sm border border-red-200 overflow-hidden">
            <div class="px-8 py-5 border-b border-red-100 bg-red-50/50 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-red-800">Delete Account</h3>
                    <p class="text-sm text-red-600/70 mt-0.5">Permanently delete your account and all of its associated data.</p>
                </div>
            </div>

            <div class="p-8">
                <div class="max-w-2xl text-sm text-slate-600 mb-6">
                    Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
                </div>
                
                <button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium py-2.5 px-6 rounded-lg shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-1">
                    Delete Account
                </button>
            </div>
        </div>

    </div>

    <!-- Deletion Verification Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8">
            @csrf
            @method('delete')

            <div class="mb-5">
                <h2 class="text-xl font-bold text-slate-900 leading-tight">Are you sure you want to delete your account?</h2>
                <p class="text-slate-500 text-sm mt-2">This action cannot be undone. Please enter your password to confirm you would like to permanently delete your account.</p>
            </div>

            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-slate-700 mb-1 sr-only">Password</label>
                <input type="password" id="password" name="password" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50 @if($errors->userDeletion->has('password')) border-red-500 @endif" placeholder="Enter your password">
                @if($errors->userDeletion->has('password'))
                    <p class="text-xs text-red-600 mt-1 font-medium">{{ $errors->userDeletion->first('password') }}</p>
                @endif
            </div>

            <div class="pt-6 mt-6 border-t border-slate-100 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')" class="px-5 py-2.5 text-sm font-medium text-slate-700 bg-white border border-slate-300 hover:bg-slate-50 rounded-lg transition-colors">
                    Cancel
                </button>
                <button type="submit" class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white font-medium text-sm rounded-lg shadow-sm transition-colors">
                    Delete Account
                </button>
            </div>
        </form>
    </x-modal>
</x-app-layout>


