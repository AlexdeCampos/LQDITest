<template>
    <div class="main">
        <div class="nav">
            <img src="/img/lqdi.svg" alt="" />
            <button on-click="goToLogin">Login</button>
        </div>
        <div class="about">
            <div class="about-text">
                <h2>
                    Construímos estratégias, desig e tecnologia de ponta para o
                    seu negócio
                </h2>
                <p>Converse com nossa equipe sobre o seu projeto</p>
            </div>
            <img src="/img/image-about-1.png" alt="" class="about-images" />
            <img src="/img/image-about-2.png" alt="" class="about-images" />
            <img src="/img/image-about-3.png" alt="" class="about-images" />
            <img src="/img/image-about-4.png" alt="" class="about-images" />
        </div>
        <div class="articles">
            <div v-for="card in cards" :key="card.title">
                <article-card-component-vue :card="card" />
            </div>
            <!-- <div class="article-card">
                <img src="/img/image-article-1.png" class="article-image" />
                <h4>Por que é importante ter um site de qualidade?</h4>
                <p>
                    Um site de qualidade passou a ser um dos meios de exposição
                    de marca mais eficientes no ambiente online. Ele funciona
                    como uma especie de cartão...
                </p>
            </div>
            <div class="article-card">
                <img src="/img/image-article-2.png" class="article-image" />
                <h4>Por que é importante ter um site de qualidade?</h4>
                <p>
                    Um site de qualidade passou a ser um dos meios de exposição
                    de marca mais eficientes no ambiente online. Ele funciona
                    como uma especie de cartão...
                </p>
            </div> -->
            <div class="newslatter-form">
                <h2>
                    Receba os nossos artigos de interesse na sua caixa de
                    entrada.
                </h2>
                <form action="" method="post">
                    <input
                        v-model="leadForm.email"
                        type="email"
                        placeholder="Escreva aqui seu email..."
                        required
                    />
                    <input
                        v-model="leadForm.name"
                        type="text"
                        placeholder="Escreva aqui seu nome..."
                        required
                    />
                </form>
                <div class="newslatter-bottom">
                    <div class="social-medias">
                        <h6>Siga-nos em nossas mídias sociais</h6>
                        <div class="icons">
                            <img src="img/instagram.svg" alt="" />
                            <img src="img/facebook.svg" alt="" />
                            <img src="img/linkedin.svg" alt="" />
                        </div>
                    </div>
                    <div class="submit-form">
                        <button @click="sendSubmit()" type="submit">
                            Enviar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { computed, ref } from "vue";
import LeadService from "../services/LeadService.js";
import { useVuelidate } from "@vuelidate/core";
import { required, email, helpers } from "@vuelidate/validators";
import { useToast } from "vue-toast-notification";
import ArticleCardComponentVue from "../components/ArticleCardComponent.vue";
export default {
    components: {
        ArticleCardComponentVue,
    },
    setup: () => {
        const leadService = new LeadService();
        const leadForm = ref({ email: "", name: "" });
        const toast = useToast();
        const rules = computed(() => ({
            name: {
                required: helpers.withMessage(
                    "O campos nome é brigatório",
                    required
                ),
            },
            email: {
                required: helpers.withMessage(
                    "O campos email é brigatório",
                    required
                ),
                email,
            },
        }));
        const cards = [
            {
                image: "/img/image-article-1.png",
                title: "Por que é importante ter um site de qualidate?",
                content:
                    "Um site de qualidade passou a ser um dos meios de exposição de marca mais eficientes no ambiente online. Ele funciona como uma espécie de cartão...",
            },
            {
                image: "/img/image-article-2.png",
                title: "6 dicas para trabalhar com marketing digital com verba limitada",
                content:
                    "Um site de qualidade passou a ser um dos eios de exposição de marca mais eficientes no ambiente online. Ele funciona como uma espécie de cartão...",
            },
        ];

        const v$ = useVuelidate(rules, leadForm.value);
        async function sendSubmit() {
            v$.value.$touch();
            if (v$.value.$errors.length) {
                v$.value.$errors.map((error) => {
                    toast.error(error.$message);
                });
                return;
            }
            await leadService.sendLead(leadForm.value);
        }

        return { leadForm, sendSubmit, cards };
    },
};
</script>
