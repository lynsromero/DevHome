<section id="contact" class="ke eg mm mn">
  <div class="a">
    <div class="-ud-mx-4 sb wd">
      <div class="oc tf">
        <div class="animate_top la ib nd yg">
          <h2 class="pa yg bh lh sh zh mj ml rl _n ao">
            Need Help? Contact With Us
          </h2>
          <p class="mh uh ol sl">
            Submit Your Message, We will be with you as soon as possible...
          </p>
        </div>
      </div>
    </div>

    <div class="-ud-mx-4 sb">
      <div class="animate_top oc tf">
        <div class="ii ne ve ye gj k la oc nd cf hj xf dg fk gk gl om pm">
          <div x-data="{ 
    showSuccess: false, 
    successMsg: '',
    loading: false,
submitForm(e) {
    this.loading = true;
    const form = e.target;
    
    fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
        }
    })
    .then(async res => {
        const data = await res.json();
        
        if (res.ok) {
            this.successMsg = data.message;
            this.showSuccess = true;
            form.reset(); // This clears the inputs
            setTimeout(() => this.showSuccess = false, 5000);
        } else {            
          alert(data.message || 'Check your inputs');
        }
    })
    .catch(err => console.error('Fetch Error:', err))
    .finally(() => this.loading = false);
  }
}">
            @include('front.partials.messages')

            <form action="{{ route('contact.submit') }}" @submit.prevent="submitForm($event)">
              @csrf
              <div class="-ud-mx-4 sb wd">
                <div class="oc tf bl/2">
                  <div class="kb">
                    <label for="firstName" class="zh mj pa qb mh">First Name</label>
                    <input id="firstName" type="text" name="first_name" required placeholder="Enter your first name"
                      class="oe ve ye gj cj oj fi oc df cg dg di ki">
                  </div>
                </div>
                <div class="oc tf bl/2">
                  <div class="kb">
                    <label for="lastName" class="zh mj pa qb mh">Last Name</label>
                    <input id="lastName" type="text" name="last_name" required placeholder="Enter your last Name"
                      class="oe ve ye gj cj oj fi oc df cg dg di ki">
                  </div>
                </div>
                <div class="oc tf bl/2">
                  <div class="kb">
                    <label for="email" class="zh mj pa qb mh">Email</label>
                    <input id="email" type="email" name="email" required placeholder="Enter your Email"
                      class="oe ve ye gj cj oj fi oc df cg dg di ki">
                  </div>
                </div>
                <div class="oc tf bl/2">
                  <div class="kb">
                    <label for="number" class="zh mj pa qb mh">Phone number</label>
                    <input id="number" type="text" name="phone_number" placeholder="Enter your number"
                      class="oe ve ye gj cj oj fi oc df cg dg di ki">
                  </div>
                </div>
                <div class="oc tf">
                  <div class="kb">
                    <label for="message" class="zh mj pa qb mh">What are you looking for?</label>
                    <textarea id="message" name="message" required placeholder="Type your message here" rows="6"
                      class="cj oj fi oc ud oe ve ye gj df cg dg di ki"></textarea>
                  </div>
                </div>
                <div class="oc tf">
                  <div class="yg">
                    <button class="bf ub xd yd oe we ze rf jg jh nh _h xi" type="submit" :disabled="loading">
                      <span x-show="!loading">Send Message</span>
                      <span x-show="loading">Sending...</span>
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div>
            <span class="j -ud-top-5 -ud-right-5 -ud-z-10">
              <svg width="57" height="121" viewBox="0 0 57 121" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="23.0992" cy="1.62854" r="1.62854" fill="#3056D3" />
                <circle cx="12.3649" cy="1.62854" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="1.62854" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="12.3864" r="1.62854" fill="#3056D3" />
                <circle cx="12.3649" cy="12.3864" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="12.3864" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="23.1422" r="1.62854" fill="#3056D3" />
                <circle cx="12.3649" cy="23.1422" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="23.1422" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="33.9005" r="1.62854" fill="#3056D3" />
                <circle cx="12.3649" cy="33.9005" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="33.9005" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="44.6515" r="1.62854" fill="#3056D3" />
                <circle cx="12.3649" cy="44.6515" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="44.6515" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="55.4049" r="1.62854" fill="#3056D3" />
                <circle cx="12.3649" cy="55.4049" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="55.4049" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="66.1559" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="76.6744" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="87.193" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="97.7111" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="108.227" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="118.746" r="1.62854" fill="#3056D3" />
                <circle cx="12.3629" cy="66.1559" r="1.62854" fill="#3056D3" />
                <circle cx="12.3629" cy="76.6744" r="1.62854" fill="#3056D3" />
                <circle cx="12.3629" cy="87.193" r="1.62854" fill="#3056D3" />
                <circle cx="12.3629" cy="97.7111" r="1.62854" fill="#3056D3" />
                <circle cx="12.3629" cy="108.227" r="1.62854" fill="#3056D3" />
                <circle cx="12.3629" cy="118.746" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="66.1559" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="76.6744" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="87.193" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="97.7111" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="108.227" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="118.746" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="1.62854" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="12.3864" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="23.1422" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="33.9005" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="44.6515" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="55.4049" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="66.1559" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="76.6744" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="87.193" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="97.7111" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="108.227" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="118.746" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="1.62854" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="12.3864" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="23.1422" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="33.9005" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="44.6515" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="55.4049" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="66.1559" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="76.6744" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="87.193" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="97.7111" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="108.227" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="118.746" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="1.62854" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="12.3864" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="23.1422" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="33.9005" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="44.6515" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="55.4049" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="66.1559" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="76.6744" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="87.193" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="97.7111" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="108.227" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="118.746" r="1.62854" fill="#3056D3" />
              </svg>
            </span>
            <span class="j -ud-bottom-5 -ud-left-5 -ud-z-10">
              <svg width="57" height="121" viewBox="0 0 57 121" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="23.0992" cy="1.62854" r="1.62854" fill="#3056D3" />
                <circle cx="12.3649" cy="1.62854" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="1.62854" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="12.3864" r="1.62854" fill="#3056D3" />
                <circle cx="12.3649" cy="12.3864" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="12.3864" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="23.1422" r="1.62854" fill="#3056D3" />
                <circle cx="12.3649" cy="23.1422" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="23.1422" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="33.9005" r="1.62854" fill="#3056D3" />
                <circle cx="12.3649" cy="33.9005" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="33.9005" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="44.6515" r="1.62854" fill="#3056D3" />
                <circle cx="12.3649" cy="44.6515" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="44.6515" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="55.4049" r="1.62854" fill="#3056D3" />
                <circle cx="12.3649" cy="55.4049" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="55.4049" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="66.1559" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="76.6744" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="87.193" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="97.7111" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="108.227" r="1.62854" fill="#3056D3" />
                <circle cx="23.0992" cy="118.746" r="1.62854" fill="#3056D3" />
                <circle cx="12.3629" cy="66.1559" r="1.62854" fill="#3056D3" />
                <circle cx="12.3629" cy="76.6744" r="1.62854" fill="#3056D3" />
                <circle cx="12.3629" cy="87.193" r="1.62854" fill="#3056D3" />
                <circle cx="12.3629" cy="97.7111" r="1.62854" fill="#3056D3" />
                <circle cx="12.3629" cy="108.227" r="1.62854" fill="#3056D3" />
                <circle cx="12.3629" cy="118.746" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="66.1559" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="76.6744" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="87.193" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="97.7111" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="108.227" r="1.62854" fill="#3056D3" />
                <circle cx="1.62854" cy="118.746" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="1.62854" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="12.3864" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="23.1422" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="33.9005" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="44.6515" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="55.4049" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="66.1559" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="76.6744" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="87.193" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="97.7111" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="108.227" r="1.62854" fill="#3056D3" />
                <circle cx="33.8571" cy="118.746" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="1.62854" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="12.3864" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="23.1422" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="33.9005" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="44.6515" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="55.4049" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="66.1559" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="76.6744" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="87.193" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="97.7111" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="108.227" r="1.62854" fill="#3056D3" />
                <circle cx="44.6149" cy="118.746" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="1.62854" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="12.3864" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="23.1422" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="33.9005" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="44.6515" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="55.4049" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="66.1559" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="76.6744" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="87.193" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="97.7111" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="108.227" r="1.62854" fill="#3056D3" />
                <circle cx="55.3707" cy="118.746" r="1.62854" fill="#3056D3" />
              </svg>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>