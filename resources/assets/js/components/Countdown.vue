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
        name: 'Countdown',
        beforeMount() {
            this.count = countdown(new Date(2019, 1, 14, 12, 0, 0), null, countdown.DAYS|countdown.HOURS|countdown.MINUTES|countdown.SECONDS);
            setInterval(() => {
                this.count = countdown(new Date(2019, 1, 14, 12, 0, 0), null, countdown.DAYS|countdown.HOURS|countdown.MINUTES|countdown.SECONDS);
            }, 1000);
        },
        data() {
            return {
                count: 0
            };
        }
    }
</script>
