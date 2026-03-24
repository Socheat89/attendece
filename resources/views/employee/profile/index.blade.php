<x-layouts.employee pageTitle="My Profile" pageDescription="Manage your personal details and security configuration.">

    <!-- Flash Messages (Optional fallback if toast doesn't work) -->
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm" style="border-radius: 1rem; font-weight: 600; background: #ecfdf5; color: #047857;" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
        </div>
    @endif
    @if(session('status') === 'password-updated')
        <div class="alert alert-success border-0 shadow-sm" style="border-radius: 1rem; font-weight: 600; background: #ecfdf5; color: #047857;" role="alert">
            <i class="fa-solid fa-shield-check me-2"></i> Security password updated successfully.
        </div>
    @endif

    <div class="card mb-4 border-0 shadow-sm" style="border-radius: 1.5rem; overflow: hidden; background: linear-gradient(145deg, #ffffff, #f8fafc);">
        <div class="card-body p-4 p-md-5">
            <h5 class="mb-4" style="font-weight: 800; color: #1e293b;">Personal Information</h5>
            
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="d-flex align-items-center justify-content-between mb-4 pb-4" style="border-bottom: 1px solid #e2e8f0;">
                    <div class="d-flex align-items-center">
                        <div style="position: relative;" class="me-4" x-data="{ photoPreview: null, updatePreview(event) { if(event.target.files[0]) this.photoPreview = URL.createObjectURL(event.target.files[0]) } }">
                            <div style="width: 80px; height: 80px; border-radius: 24px; overflow: hidden; border: 2px solid #e2e8f0; background: #f1f5f9; position: relative; cursor: pointer; box-shadow: 0 4px 10px rgba(0,0,0,0.05);" onclick="document.getElementById('empPhotoInput').click()">
                                <img :src="photoPreview ?? '{{ Auth::user()->photo_path ? route('users.photo', Auth::user()) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&background=3b82f6&color=fff' }}'" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
                                <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; opacity: 0; transition: opacity 0.2s;" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0">
                                    <i class="fa-solid fa-camera" style="color: #fff; font-size: 1.2rem;"></i>
                                </div>
                            </div>
                            <input type="file" name="photo" id="empPhotoInput" class="d-none" accept="image/*" onchange="document.querySelector('[x-data]').__x.$data.updatePreview({target: this})">
                        </div>
                        <div>
                            <h6 class="mb-1" style="font-weight: 800; font-size: 1.1rem; color: #0f172a;">{{ Auth::user()->name }}</h6>
                            <span class="badge text-bg-primary" style="font-weight: 700; border-radius: 8px; padding: 0.4rem 0.6rem;">{{ Auth::user()->roles->first()->name ?? 'Employee' }}</span>
                        </div>
                    </div>
                </div>

                @error('photo') 
                    <div class="alert alert-danger" style="border-radius: 12px; font-weight: 600; padding: 0.75rem 1rem;">
                        {{ $message }}
                    </div> 
                @enderror

                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-6">
                        <label class="form-label" style="font-size: 0.85rem; font-weight: 700; color: #475569;">Full Name</label>
                        <input type="text" name="name" class="form-control" style="border-radius: 12px; padding: 0.8rem 1rem; background: #f8fafc; border-color: #e2e8f0; font-weight: 600; color: #0f172a;" value="{{ old('name', Auth::user()->name) }}" required>
                        @error('name') <div class="text-danger mt-1 small" style="font-weight: 600;">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" style="font-size: 0.85rem; font-weight: 700; color: #475569;">Email Address</label>
                        <input type="email" name="email" class="form-control" style="border-radius: 12px; padding: 0.8rem 1rem; background: #f8fafc; border-color: #e2e8f0; font-weight: 600; color: #0f172a;" value="{{ old('email', Auth::user()->email) }}" required>
                        @error('email') <div class="text-danger mt-1 small" style="font-weight: 600;">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary" style="font-weight: 700; border-radius: 12px; padding: 0.8rem 1.75rem; background: #2563eb; border: none; box-shadow: 0 4px 14px rgba(37,99,235,0.3); transition: all 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                        <i class="fa-solid fa-cloud-arrow-up me-2"></i> Save Profile
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Security Tab -->
    <div class="card mb-4 border-0 shadow-sm" style="border-radius: 1.5rem; overflow: hidden; background: #fff;">
        <div class="card-body p-4 p-md-5">
            <div class="d-flex align-items-center mb-4 gap-3 pb-3" style="border-bottom: 1px solid #f1f5f9;">
                <div style="width: 44px; height: 44px; border-radius: 14px; background: #ecfdf5; color: #059669; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0;">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <div>
                    <h5 class="mb-0" style="font-weight: 800; color: #0f172a;">Sign-in & Security</h5>
                    <p class="mb-0 text-muted" style="font-size: 0.8rem; font-weight: 500;">Update your password to secure your account</p>
                </div>
            </div>
            
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label" style="font-size: 0.85rem; font-weight: 700; color: #475569;">Current Password</label>
                    <input type="password" name="current_password" class="form-control" style="border-radius: 12px; padding: 0.8rem 1rem; background: #f8fafc; border-color: #e2e8f0; font-weight: 600;" placeholder="••••••••">
                    @error('current_password', 'updatePassword') <div class="text-danger mt-1 small" style="font-weight: 600;">{{ $message }}</div> @enderror
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-6">
                        <label class="form-label" style="font-size: 0.85rem; font-weight: 700; color: #475569;">New Password</label>
                        <input type="password" name="password" class="form-control" style="border-radius: 12px; padding: 0.8rem 1rem; background: #f8fafc; border-color: #e2e8f0; font-weight: 600;" placeholder="••••••••">
                        @error('password', 'updatePassword') <div class="text-danger mt-1 small" style="font-weight: 600;">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" style="font-size: 0.85rem; font-weight: 700; color: #475569;">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" style="border-radius: 12px; padding: 0.8rem 1rem; background: #f8fafc; border-color: #e2e8f0; font-weight: 600;" placeholder="••••••••">
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary" style="font-weight: 700; border-radius: 12px; padding: 0.8rem 1.75rem; background: #059669; border: none; box-shadow: 0 4px 14px rgba(5,150,105,0.25); transition: all 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                        <i class="fa-solid fa-key me-2"></i> Update Password
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Terminal Sign Out Button -->
    <form method="POST" action="{{ route('logout') }}" class="mb-2">
        @csrf
        <button type="submit" class="btn w-100" style="font-weight: 800; text-transform: uppercase; letter-spacing: 1px; font-size: 0.9rem; border-radius: 1.25rem; padding: 1.1rem; background: #fef2f2; color: #dc2626; border: 1.5px solid #fecaca; transition: all 0.2s;" onmouseover="this.style.background='#fio2f2'; this.style.transform='scale(1.01)'" onmouseout="this.style.background='#fef2f2'; this.style.transform='scale(1)'">
            <i class="fa-solid fa-power-off me-2"></i> Sign Out of Device
        </button>
    </form>

</x-layouts.employee>
