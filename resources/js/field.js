import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-nova4-liveupdate', IndexField)
  app.component('detail-nova4-liveupdate', DetailField)
  app.component('form-nova4-liveupdate', FormField)
})
