@if(auth()->user()->hasRole('Head') || auth()->user()->hasRole('Maintenance Personnel') || auth()->user()->hasRole('Student') || auth()->user()->hasRole('Staff'))

<div class="setting-box">
    <h2 class="P">My Profile</h2>
    <div class="profile">
    @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @foreach ($users as $user)
        <form wire:submit.prevent="saveChanges" class="profile-form">
            <div class="form-group">
                <label for="first-name">First Name</label>
                <input wire:model.defer="first_name" id="first-name" value="{{ $user->first_name }}" readonly>
            </div>
            <div class="form-group">
                <label for="last-name">Last Name</label>
                <input wire:model.defer="last_name" id="last-name" value="{{ $user->last_name }}" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input wire:model.defer="email" id="email" value="{{ $user->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input wire:model.defer="age" id="age" value="{{ $user->age }}" readonly>
            </div>

            <div class="form-group">
                <label for="number">Contact Number</label>
                <input wire:model.defer="contnum" id="number" value="{{ $user->contnum }}" readonly>
            </div>
            <div class="form-group">
                <label for="idnum">ID number</label>
                <input wire:model.defer="idnum" id="idnum" value="{{ $user->idnum }}" readonly>
            </div>
            <div class="form-group">
                <label for="bdate">Birthdate</label>
                <input wire:model.defer="bdate" id="bdate" value="{{ $user->bdate }}" readonly>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                 @foreach($user->roles as $role)
					<li>{{ $role->name }}</li>
					@endforeach
            </div>
            <div class="form-group password-group">
                <label for="password">New Password</label>
                <div class="password-container">
                    <input type="password" id="password" wire:model="password">
                    <i class="fa fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                </div>
            </div>
            <div class="form-group password-group">
                <label for="password_confirmation">Confirm Password</label>
                <div class="password-container">
                    <input type="password" id="password_confirmation" wire:model="password_confirmation">
                    <i class="fa fa-eye" id="togglePasswordConfirmation" style="cursor: pointer;"></i>
                </div>
            </div>
            <div class="form-actions">
                <button type="button" class="edit-btn" onclick="toggleEdit()"><i class="fas fa-edit"></i> Edit</button>
                <button type="submit" class="save-btn"><i class="fas fa-save"></i> Save</button>
            </div>
        </form>
        @error('firstName')
        <span class="error">{{ $message }}</span>
        @enderror
        @error('age')
        <span class="error">{{ $message }}</span>
        @enderror
        @error('contnum')
        <span class="error">{{ $message }}</span>
        @enderror
        @error('idnum')
        <span class="error">{{ $message }}</span>
        @enderror
        @error('bdate')
        <span class="error">{{ $message }}</span>
        @enderror
        @endforeach
    </div>
</div>
@endif
<style>
.setting-box {
  position: relative;
  background-color: #f8f9fa;
  padding: 24px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.P {
  position: relative;
  text-align: center;
  color: #343a40;
  margin-bottom: 20px;
  font-size: 1.5rem;
  font-weight: bold;
  text-transform: uppercase;
}

.profile-form {
  position: relative;
  background-color: #ffffff;
  padding: 24px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column;
}

.form-group {
  position: relative;
  display: flex;
  width: 100%;
  flex-direction: column;
  margin-bottom: 16px;
}

label {
  position: relative;
  font-weight: bold;
  margin-bottom: 6px;
  color: #495057;
  width: 100%;
}

input {
  position: relative;
  padding: 10px 12px;
  border: 1px solid #ced4da;
  border-radius: 6px;
  background-color: #ffffff;
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
  width: 100%;
}

input:read-only {
  background-color: #f8f9fa;
  cursor: not-allowed;
}

input:focus {
  outline: none;
  border-color: #80bdff;
  box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
}

.form-actions {
  position: relative;
  display: flex;
  justify-content: flex-end;
  margin-top: 16px;
}

.edit-btn,
.save-btn {
  position: relative;
  padding: 10px 20px;
  border: none;
  border-radius: 6px;
  color: #ffffff;
  cursor: pointer;
  transition: background-color 0.3s ease;
  margin-left: 10px;
}

.edit-btn {
  background-color: #007bff;
}

.save-btn {
  background-color: #28a745;
}

.edit-btn:hover {
  background-color: #0056b3;
}

.save-btn:hover {
  background-color: #218838;
}

.error {
  position: relative;
  color: #dc3545;
  font-weight: bold;
  margin-top: 4px;
}

.password-container {
  position: relative;
}

.password-container input {
  width: calc(100% - 40px);
  padding-right: 36px;
}

.password-container i {
  position: absolute;
  top: 50%;
  right: 12px;
  transform: translateY(-50%);
  cursor: pointer;
  color: #6c757d;
}

.password-group {
  grid-column: span 1;
}


.alert-success {
  position: relative;
  background-color: #d4edda;
  color: #155724;
  padding: 10px 12px;
  border-radius: 6px;
  margin-bottom: 16px;
  border: 1px solid #c3e6cb;
}

/* Responsive styles */
@media (max-width: 720px) {
  .setting-box {
    margin: 8px;
  }
  .profile-form {
    padding: 16px;
  }
}

@media (min-width: 900px) {
  .setting-box {
    max-width: 1500px;
    margin: 16px auto;
  }
  .profile-form {
    display: grid;
    gap: 12px;
  }
  .password-group {
    grid-column: span 3;
  }
}

/* Input field responsiveness */
@media (max-width: 480px) {
  input {
    width: 100%;
  }
}

@media (min-width: 481px) and (max-width: 768px) {
  input {
    width: 80%;
  }
}

@media (min-width: 769px) {
  input {
    width: 60%;
  }
}
</style>
<script>
     document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        const togglePasswordConfirmation = document.querySelector('#togglePasswordConfirmation');
        const passwordConfirmation = document.querySelector('#password_confirmation');

        togglePasswordConfirmation.addEventListener('click', function () {
            const type = passwordConfirmation.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordConfirmation.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    });
    function toggleEdit() {
        var inputs = document.querySelectorAll('.profile-form input');
        inputs.forEach(function(input) {
            input.removeAttribute('readonly');
            input.classList.remove('readonly');
        });
    }

    // Add event listener for form submission
    var form = document.querySelector('.profile-form');
    form.addEventListener('submit', function() {
        var overlay = document.createElement('div');
        overlay.classList.add('profile-overlay');
        var spinner = document.createElement('div');
        spinner.classList.add('spinner');
        overlay.appendChild(spinner);
        document.querySelector('.profile').appendChild(overlay);
        overlay.classList.add('show');
    });
</script>