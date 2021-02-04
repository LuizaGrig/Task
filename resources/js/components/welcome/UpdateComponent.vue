
<template>
    <div id="app">
        <button class="button" @click="showModal = true"
                data-toggle="modal"
                :data-target=" '#myModal' "     >Edit</button>


        //#myModalic het + task.id
        <!--        dranic het mej@ @click="openModal(task.id)"-->
        <div class="modal-fade" >  //:id=" 'myModal' + task.id"
            <transition name="fade" appear>
                <div class="modal-overlay" v-if="showModal" @click="showModal = false">

                </div>

            </transition>
            <transition name="slide" appear>
                <div class="modal" v-if="showModal">
                    <h1>Edit a Task</h1>
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                    <!--            {{task.title}} //p-n poxel textarea-->
                    <!--            <textarea v-model="updateTask">{{task.title}}</textarea>-->


                    <button class="button" @click="showModal = false"> Close Modal</button>

                    <!--            <button @click="updateTask(task.id)">Save changes</button>-->
                </div>
            </transition>
        </div>


    </div>
</template>


<script>
export default{
    el: '#app',
    data(){
        return{
            showModal: true
        }
    },
    // methods: {
    //     openModal(id){
    //         console.log(id)
    //         // kwnswli texy e2e ajdin gtnuma nuyn deletei functionn enq grum
    //     }
    // },
    // updateTask(id){
    //     nuyn add new taski functionn enq grum, api-um stexcum enq u controllerum update function
    //
    //     controllerum
    //     public function update(Request $request, $id){
    //         $updateTask = DB::table('tasks')->where('id', $id)->update([
    //             'title' => $request->title;
    //         ...;
    //
    //         ]);
    //         if($updateTask){
    //             return post::with('coloumneri', anunner@')
    //                 ->orderBy('created_at', 'DESC')->get();
    //         }
    //     }
    // }
}
</script>
