<template>
    <div class="container main">
      <div class="row">
        <div class="col-md-12">
          <div class="mx-auto text-center register-step1">
            <div class="register-step1-header mx-auto">
              <ul class="wizard">
                <li class="wizard-step">
                  <a href="#1" class="wizard-step-link">
                    Detil Order
                  </a>
                </li>
                <li class="wizard-step">
                  <a href="#2" class="wizard-step-link-2">
                    Data Diri
                  </a>
                </li>
                <li class="wizard-step">
                  <a href="#3" class="wizard-step-link-2">
                    Pembayaran
                  </a>
                </li>
              </ul>
            </div>
            <div class="register-step1-content">
              <H1 class="detil-order">Detil Order</H1>
              <div class="content-header">
                <h5>Product</h5>
                <h3>TWC - Regular</h3>
                <div>
                  <h5>e-ticket</h5>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione ullam itaque.</p>
                </div>
              </div>
            </div>
            
          </div>
        </div>     
      </div>
    </div>
</template>

<script>
    export default {
      name: 'halo'
    }
</script>

<style lang="scss" scoped>
@import '../../sass/register-step.scss';
</style>
