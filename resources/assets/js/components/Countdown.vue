<template>
    <div class="countdown">
        <div class="row">
            <div class="col-3 text-center">
                <div class="title">
                {{ count.days }}
                </div>
                <div class="subtitle">
                    HARI
                </div>
            </div>
            <div class="col-3 text-center odd">
                <div class="title">
                    {{ count.hours }}
                </div>
                <div class="subtitle">
                    JAM
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="title">
                    {{ count.minutes }}
                </div>
                <div class="subtitle">
                    MENIT
                </div>
            </div>
            <div class="col-3 text-center odd">
                <div class="title">
                    {{ count.seconds }}
                </div>
                <div class="subtitle">
                    DETIK
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import countdown from 'countdown';
    export default {
        beforeMount() {
            this.count = countdown(new Date(2018, 9, 18, 12, 0, 0));
            setInterval(() => {
                this.count = countdown(new Date(2018, 9, 18, 12, 0, 0));
            }, 1000);
        },
        data() {
            return {
                count: 0
            };
        }
    }
</script>
