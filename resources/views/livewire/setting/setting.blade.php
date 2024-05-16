
<style>
  .setting-box {
    background-color: #f8f9fa;
    border-radius: 8px;
    padding: 24px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    max-width: 700px; /* Added a max-width */
    margin: 20px auto; /* Centered horizontally */
  }

  .P {
    text-align: center;
    color: #343a40;
    margin-bottom: 25px;
    font-size: 1.5em;
    font-weight: bold;
    text-transform: uppercase;
  }

  .profile {
    display: grid;
    grid-template-columns: 1fr;
    gap: 15px;
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  }
  .profile-1 {

    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  }
/* For screens smaller than 480px */
@media (max-width: 479px) {
  .profile {
    grid-template-columns: 1fr;
  }
  
  .form-group .input {
    width: 100%;
  }
}

/* For screens between 480px and 767px */
@media (min-width: 480px) and (max-width: 767px) {
  .profile {
    grid-template-columns: 1fr;
  }
  
  .form-group .input {
    width: 100%;
  }
}

/* For screens between 768px and 1023px */
@media (min-width: 768px) and (max-width: 1023px) {
  .profile {
    grid-template-columns: 1fr 1fr;
  }
  
  .form-group .input {
    width: 100%;
  }
}

/* For screens larger than 1024px */
@media (min-width: 1024px) {
  .profile {
    grid-template-columns: 1fr 1fr;
  }
  
  .form-group .input {
    width: auto;
  }
}
  .form-group {
    display: flex;
    flex-direction: column;
    font-weight: bold;
    margin-bottom: 5px;
    color: #495057;
  }

  input {
    padding: 10px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    background-color: #ffffff;
    transition: background-color 0.3s ease;
  }

  input:read-only {
    background-color: #e9ecef;
    cursor: not-allowed;
  }

  input:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
  }

  .text5 {
    margin-top: 20px;
  }
  h5{
    font-weight: bold;
    margin-bottom: 5px;
    color: #495057;
  }

  .ChangeP {
    color: #343a40;
    margin-bottom: 10px;
    font-size: 1.2em;
    font-weight: bold;
  }

  .text5 p {
    color: #495057;
  }

  .text5 a {
    color: #007bff;
    text-decoration: none;
  }

  .text5 a:hover {
    text-decoration: underline;
  }
</style>
@if(auth()->user()->hasRole('Head')|| auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Dean'))


<div class="setting-box">
  <h2 class="P">My Profile</h2>
  <div class="profile">
    @foreach ($users as $user)
    <div class="form-group">
      <span>Name</span>
      <input value="{{ $user->first_name }} {{ $user->last_name }}" readonly>
    </div>
    <div class="form-group">
      <span>Email</span>
      <input value="{{ $user->email }}" readonly>
    </div>
    @endforeach
  </div>
  <div class="text5">
    <h5 class="ChangeP">Account Setting</h5>
    <p>To manage your account. Go to <a href="my-profile">Account Setting</a></p>
  </div>
</div>
@endif
@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Head')||auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Dean'))
<div class="setting-box">
                <div class="profile-1">
                    <h2 class="P">Notification Settings</h2>
                    
                    <div class="Notification">
                        <h5 >Fire Extinguisher Alerts</h5>
                        <p class="text6">Receive notifications for fire extinguisher-related alerts.</p>
                        <div class="switch-container">
                            <input type="checkbox" id="fireExtinguisherSwitch">
                            <label for="fireExtinguisherSwitch" class="switch"></label>
                        </div>
                    </div>
                    <div class="Notification">
                        <h5 >New User Alert</h5>
                        <p class="text6">Enable this notification to receive alerts when a new user signs up.</p>
                        <div class="switch-container">
                            <input type="checkbox" id="commentsSwitch">
                            <label for="commentsSwitch" class="switch"></label>
                        </div>
                    </div>
                    @if(auth()->user()->hasRole('Head')|| auth()->user()->hasRole('Maintenance Personnel')||auth()->user()->hasRole('Dean'))
                    <div class="Notification">
                    <h5 >System Updates</h5>
                    <p class="text6">Receive notifications for system updates and maintenance.</p>
                    <div class="switch-container">
                        <input type="checkbox" id="systemUpdatesSwitch">
                        <label for="systemUpdatesSwitch" class="switch"></label>
                    </div>
                    </div>
                    @endif
                </div>
                </div>
@endif