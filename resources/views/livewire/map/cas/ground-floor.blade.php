
<div>
<style>
  
    .floor-content {
        display: inline-block;
        padding: 20px;
        position: relative;
    }
    

.CasDean,
.CAS106,
.CAS105,
.CAS104,
.MCL,
.CAS103,
.CAS102,
.CAS101,
.CAS107,
.CAS108,
.CAS109,
.CAS110,
.CAS111,
.CAS112,
.CAS-SSG {
    position: absolute;
    cursor: pointer;
    display: flex;
    gap: 10px;
}
.fire-ext {
  height: 35px;
  width: 45px
}
.image-with-text {
    display: flex;
    align-items: center;
    margin-top: -35px;
}
.image-with-text p {
  font-size: 20px;
  margin-top: 15px;
  margin-left: -12px;

}

.text-next-to-image {
    margin-left: 10px; 
}
span{
  font-weight: bold;
  font-size: 26px
}
   





  .CasDean{
    top: 45px;
    left: 113px;
  }
  .CAS106{
    top: 45px;
    left: 233px;
  }
  .CAS105{
    top: 45px;
    left: 353px;
  }
  .CAS104{
    top: 45px;
    left: 470px;
  }
  .MCL{
    top: 45px;
    left: 530px;
  }
  .CAS103{
    top: 45px;
    left: 645px;
  }
  .CAS102{
    top: 45px;
    left: 765px;
  }
  .CAS101{
    top: 45px;
    left: 885px;
  }
  .CAS107{
    top: 220px;
    left: 173px;
  }
  .CAS108{
    top: 200px;
    left: 265px;
  }
  .CAS109{
    top: 200px;
    left: 385px;
  }
  .CAS-SSG{
    top: 200px;
    left: 485px;
  }
  .CAS110{
    top: 200px;
    left: 620px;
  }
  .CAS111{
    top: 200px;
    left: 740px;
  }
  .CAS112{
    top: 200px;
    left: 857px;
  }

  #eye-icons,
  #edit-icons {
      font-size: small;
      display: inline-block;
      margin-left: 13px;
  }

  #edit-icons {
      color: green;
      margin-left: -3px;
  }

  #eye-icons {
      color: gray;
      margin-left: 30px;
  }
  #plus-icons{
    margin-left:15px;
    margin-top:15px;
  }

  .edit-icon {
      color: green;
      margin-left: -13px;
  }
  .plus-icon{
      color: black;
      margin-left: -35px;
  }
  .circle-icon{
    margin-left: -70px;
  }

  .eye-icon {
      color: gray;
      padding-right: 25px;
  }
  .active {
    background-color: green; /* Active state background color */
}

.inactive {
    background-color: orange; /* Inactive state background color */
}

.refill {
    background-color: blue; /* Refill state background color */
}
</style>

<livewire:flash-message.flash-message />
<div class="scroll-container">
    <div id="ground-floor" class="floor-content">
 
        <img src="{{ asset('assets/img/GroundFloor.png') }}" alt="GroundFloor" width="1000px" height="300px">
        @foreach($fire as $fires)
        <div class="icon-container CasDean" wire:click="editFire({{ $fires->id}})">
          <i class="fas fa-edit edit-icon"></i>
            </div>
            <div class="icon-container CasDean" wire:click="viewFire({{ $fires->id}})">
                <i class="fas fa-eye eye-icon"></i>
            </div>
            <div class="icon-container CasDean" wire:click="createFire">
                <i class="fas fa-plus plus-icon"></i>
            </div>


        <div class="icon-container CAS106" >
            <i class="fas fa-edit edit-icon" wire:click="editFire({{ $fires->id }})"></i>
        </div>
        <div class="icon-container CAS106"  wire:click="viewFire({{ $fires->id }})" >
            <i class="fas fa-eye eye-icon"></i>
        </div>
        <div class="icon-container CAS106" wire:click="createFire">
            <i class="fas fa-plus plus-icon"></i>
        </div>
       
        <div class="CAS105" wire:click="viewFire({{ $fires->id}})"><i class="fas fa-eye eye-icon"></i></div>
        <div class="CAS105" wire:click="editFire({{ $fires->id}})"><i class="fas fa-edit edit-icon"></i></div>
        <div class="CAS105" wire:click="createFire({{ $fires->id}})"><i class="fas fa-plus plus-icon"></i></div>
        <div class="CAS104" wire:click="viewFire({{ $fires->id}})"><i class="fas fa-eye eye-icon"></i></div>
        <div class="CAS104" wire:click="editFire({{ $fires->id}})"><i class="fas fa-edit edit-icon"></i></div>
        <div class="CAS104" wire:click="createFire"><i class="fas fa-plus plus-icon"></i></div>
        <div class="MCL"    wire:click="viewFire({{ $fires->id}})"><i class="fas fa-eye eye-icon"></i></div>
        <div class="MCL"    wire:click="editFire({{ $fires->id}})"><i class="fas fa-edit edit-icon"></i></div>
        <div class="MCL"    wire:click="createFire"><i class="fas fa-plus plus-icon"id="plus-icons"></i></div>
        <div class="CAS103" wire:click="viewFire({{ $fires->id}})"><i class="fas fa-eye eye-icon"></i></div>
        <div class="CAS103" wire:click="editFire({{ $fires->id}})"><i class="fas fa-edit edit-icon"></i></div>
        <div class="CAS102" wire:click="viewFire({{ $fires->id}})"><i class="fas fa-eye eye-icon"></i></div>
        <div class="CAS102" wire:click="editFire({{ $fires->id}})"><i class="fas fa-edit edit-icon"></i></div>
        <div class="CAS101" wire:click="viewFire({{ $fires->id}})"><i class="fas fa-eye eye-icon"></i></div>
        <div class="CAS101" wire:click="editFire({{ $fires->id}})"><i class="fas fa-eye eye-icon"></i></div>
        <div class="CAS101" wire:click="editFire({{ $fires->id}})"><i class="fas fa-edit edit-icon"></i></div>
        <div class="CAS107" wire:click="viewFire({{ $fires->id}})"><i class="fas fa-eye eye-icon"></i></div>
        <div class="CAS107" wire:click="editFire({{ $fires->id}})"><i class="fas fa-edit edit-icon"></i></div>
        <div class="CAS108" wire:click="viewFire({{ $fires->id}})"><i class="fas fa-eye eye-icon"></i></div>
        <div class="CAS108" wire:click="editFire({{ $fires->id}})"><i class="fas fa-edit edit-icon"></i></div>
        <div class="CAS109" wire:click="viewFire({{ $fires->id}})"><i class="fas fa-eye eye-icon"></i></div>
        <div class="CAS109" wire:click="editFire({{ $fires->id}})"><i class="fas fa-edit edit-icon"></i></div>
        <div class="CAS-SSG" wire:click="viewFire({{ $fires->id}})"><i class="fas fa-eye eye-icon" id="eye-icons"></i></div>
        <div class="CAS-SSG" wire:click="editFire({{ $fires->id}})"><i class="fas fa-edit edit-icon" id="edit-icons"></i></div>
        <div class="CAS110" wire:click="viewFire({{ $fires->id}})"><i class="fas fa-eye eye-icon"></i></div>
        <div class="CAS110" wire:click="editFire({{ $fires->id}})"><i class="fas fa-edit edit-icon"></i></div>
        <div class="CAS111" wire:click="viewFire({{ $fires->id}})"><i class="fas fa-eye eye-icon"></i></div>
        <div class="CAS111" wire:click="editFire({{ $fires->id}})"><i class="fas fa-edit edit-icon"></i></div>
        <div class="CAS112" wire:click="viewFire({{ $fires->id}})"><i class="fas fa-eye eye-icon"></i></div>
        <div class="CAS112" wire:click="editFire({{ $fires->id}})"><i class="fas fa-edit edit-icon"></i></div>

        @endforeach

<h1 >GROUND FLOOR</h1>

<div>
</div>
</div>












  <!-- Your existing HTML code -->

  