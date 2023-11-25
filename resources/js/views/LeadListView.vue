<template>
    <div class="main">
        <div class="nav">
            <img src="/img/lqdi.svg" alt="" />
            <div>
                <button @click="goToLead()" class="btn-back">
                    Voltar para a leadPage
                </button>
                <button @click="logOut($event.preventDefault())">Sair</button>
            </div>
        </div>
        <div class="table-section">
            <div>
                <h2 class="table-title">Tabela de leads cadastrados</h2>
            </div>
            <table class="table lead-table">
                <thead>
                    <tr>
                        <th scope="col">*</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Data de criação</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody v-for="lead in leadList" :key="lead.id">
                    <tr>
                        <th scope="row">{{ lead.id }}</th>
                        <td>{{ lead.name }}</td>
                        <td>{{ lead.email }}</td>
                        <td>
                            {{ formatDate(lead.created_at) }}
                        </td>
                        <td>
                            <button
                                @click="sendEmail(lead.id)"
                                class="conctact-email-button"
                            >
                                Enviar email de contato
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import { onBeforeMount, onMounted, ref } from "vue";
import LeadService from "../services/LeadService";
import AuthService from "../services/AuthService";
export default {
    setup: () => {
        const leadService = new LeadService();
        const authService = new AuthService();
        const leadList = ref([]);

        function formatDate(date) {
            const newDate = new Date(date);
            const formatedDate = newDate.toLocaleDateString("pt-BR", {});
            return formatedDate;
        }
        async function logOut() {
            await authService.logout();
            window.location = "/";
        }
        async function goToLead() {
            window.location = "/";
        }

        async function sendEmail(id) {
            await leadService.sendContactEmail(id);
        }

        onMounted(async () => {
            const leads = await leadService.getLeads();
            leadList.value = leads;
        });

        onBeforeMount(() => {
            const token = localStorage.getItem("token");
            if (!token) {
                console.log("redirect");
            }
        });
        return { logOut, goToLead, leadList, formatDate, sendEmail };
    },
};
</script>
