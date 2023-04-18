
const {createApp} = Vue

const FormMessage = {
    data() {
        return {
            nombre : Math.floor(Math.random() * 100 + 1)
        }
    },

    methods : {

    },

    template :  '    <form method="post" action="?c=new-message">\n' +
        '        <label for="username">Username : </label>\n' +
        '        <input type="text" name="username" id="username">\n' +
        '        <br>\n' +
        '        <label for="message">Message : </label>\n' +
        '        <input type="text" name="message" id="message">\n' +
        '        <br>\n' +
        '        <input type="submit" name="send">\n' +
        '    </form>' ,
}


createApp({
    data() {
        return{
            datas : []
        }
    },

    template : '  <div id="box">\n' +
        '        <div class="message" v-for="data in datas" :key="data.id">\n' +
        '            {{actualiser}}\n' +
        '            <p><b>{{data.username}} à {{data.date}}</b></p>\n' +
        '            <p>{{data.message}}</p>\n' +
        '        </div>\n' +
        '    </div>\n'
        +
        '<FormMessage></FormMessage>'
    ,

    computed: {
        actualiser() {
            setInterval(()=> {
                axios.get("?c=get-messages")
                    .then((response) => {
                        this.datas = response.data
                    })
            }, 1000)

        }

    },

    created() {
        axios.get("?c=get-messages")
            .then((response) => {
                this.datas = response.data
            })

    },

    components : {
        FormMessage,

    }

}



).mount('#app')




