      @if($status=='Active')

          <span class="badge border border-primary text-primary"><i class="ri-circle-fill"></i>
            Primary</span>
         @elseif($status=='Active')
            <span class="badge border border-secondary text-secondary"><i class="ri-circle-fill"></i>
            Secondary</span>
         @elseif($status=='Active')
            <span class="badge border border-success text-success"><i class="ri-circle-fill"></i>
            Success</span>
         @elseif($status=='Active')
            <span class="badge border border-danger text-danger"><i class="ri-circle-fill"></i> Danger</span>
        @elseif($status=='Active')
          <span class="badge border border-warning text-warning"><i class="ri-circle-fill"></i>
            Warning</span>

         @elseif($status=='Active')
            <span class="badge border border-info text-info"><i class="ri-circle-fill"></i> Info</span>
         @elseif($status=='Active')
          <span class="badge border border-light text-dark"><i class="ri-circle-fill"></i> Light</span>
         @elseif($status=='Active')
          <span class="badge border border-dark text-dark"><i class="ri-circle-fill"></i> Dark</span>
         @elseif($status=='Active')
          <span class="badge border border-black text-black"><i class="ri-circle-fill"></i> Black</span>
       @endif