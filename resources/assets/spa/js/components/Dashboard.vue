<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Meu Dashboard</div>

                    <div class="panel-body">
                        Menu conteudo.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	import Auth from '../services/auth';
    export default {
        ready(){
            //console.log(Auth.user());
        }
    }
</script>
