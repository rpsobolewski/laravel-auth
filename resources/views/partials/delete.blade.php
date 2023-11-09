 <!-- Button trigger modal -->
 <button type="button" class="btn btn-danger mt-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $project->id }}">
     Delete
 </button>


 <!-- Modal -->
 <div class="modal fade" id="staticBackdrop-{{ $project->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="staticBackdropLabel">DELETE</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 Are you sure you want to delete?
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                 <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST" class="d-inline">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger">Delete</button>
                 </form>
             </div>

         </div>
     </div>
 </div>