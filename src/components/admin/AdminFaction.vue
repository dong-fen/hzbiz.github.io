<template>
  <div class="Adminfaction">
   <el-row>
      <el-col :span="24">
        <el-breadcrumb separator-class="el-icon-arrow-right">
          <el-breadcrumb-item :to="{ path: '/Admin' }">
          {{prop.title}}
          </el-breadcrumb-item>
          <el-breadcrumb-item>门派注册管理</el-breadcrumb-item>
        </el-breadcrumb>
      </el-col>
    </el-row>

    <section>
      <el-row>
          <el-col :span="16">
            <el-row type="flex" class="row-bg" justify="space-around">
              <el-col :span="24">
                <el-form :model="faction" :rules="rules" ref="faction" label-width="100px" class="demo-ruleForm">
                  <el-form-item label="门派名称" prop="name">
                    <el-input v-model="faction.className"></el-input>
                  </el-form-item>
                  <el-form-item label="掌门设置" prop="region">
                    <el-select v-model="faction.classUserID" placeholder="请选择门派负责人">
                      <el-option label="王昕" value="王昕"></el-option>
                      <el-option label="王雪晶" value="王雪晶"></el-option>
                    </el-select>
                  </el-form-item>
                  <el-form-item label="创建时间" required>
                    <el-col :span="11">
                      <el-form-item prop="date1">
                        <el-date-picker type="date" placeholder="选择日期" v-model="faction.date1" style="width: 100%;"></el-date-picker>
                      </el-form-item>
                    </el-col>
                    <el-col class="line" :span="2" style="text-align:center">-</el-col>
                    <el-col :span="11">
                      <el-form-item prop="date2">
                        <el-time-picker type="fixed-time" placeholder="选择时间" v-model="faction.date2" style="width: 100%;"></el-time-picker>
                      </el-form-item>
                    </el-col>
                  </el-form-item>
                  <el-form-item label="是否开放" prop="delivery">
                    <el-switch v-model="faction.isClassOpen"></el-switch>
                  </el-form-item>
                  <el-form-item label="门派性质" prop="type">
                    <el-radio-group v-model="faction.classNature">
                      <el-radio label="魔教" name="type"></el-radio>
                      <el-radio label="正教"  name="type"></el-radio>
                      <el-radio label="六扇门" name="type"></el-radio>
                      <el-radio label="锦衣卫" name="type"></el-radio>
                    </el-radio-group>
                  </el-form-item>
                  <el-form-item label="门派介绍" prop="desc">
                    <el-input type="textarea" :rows=6 v-model="faction.desc"></el-input>
                  </el-form-item>
                  <el-form-item>
                    <el-button type="primary" @click="submitForm('faction')">创建门派</el-button>
                    <el-button @click="resetForm('faction')">重置</el-button>
                  </el-form-item>
                </el-form>
              </el-col>
            </el-row>
          </el-col>
          </el-row>
    </section>

  </div>
</template>

<script>
export default {
  name: 'Adminfaction',
  props:{
    prop:Object
  },
  data(){
    return {
        faction: {
          className: '',
          classUserID: '',
          date: '',
          time: '',
          isClassOpen: true,
          classNature: "",
          classInfo: ''
        },
        rules: {
          className: [
            { required: true, message: '请输入注册门派的名称', trigger: 'blur' },
            { min: 3, max: 15, message: '门派名称 长度在 3 到 15 个字符', trigger: 'blur' }
          ],
          classUserID: [
            { required: true, message: '请选择门派掌门人', trigger: 'change' }
          ],
          date: [
            { type: 'date', required: true, message: '请选择日期', trigger: 'change' }
          ],
          time: [
            { type: 'date', required: true, message: '请选择时间', trigger: 'change' }
          ],
          classNature: [
            {required: true, message: '请选择门派性质', trigger: 'change' }
          ],
          classInfo: [
            { required: true, message: '请输入门派介绍', trigger: 'blur' }
          ]
        }
      };
  },
  methods:{
     submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
             
                let formData = new FormData();
                formData.append('send',true)
                formData.append('className',this.faction.className)
                formData.append('classUserID',this.faction.classUserID)
                formData.append('classAddTime',this.faction.date1+" "+this.faction.date2)
                formData.append('classNature',this.faction.classNature)
                formData.append('classInfo',this.faction.classInfo)

                this.axios.post('http://t.hzbiz.net/static/api/FactionAdd.php',formData)
                .then((res)=>{
                    console.log(res)
                })
                .catch(err=>{
                  console.log(err)
                })


          } else {
            console.log('error submit!!');
            return false;
          }
        });
      },
      resetForm(formName) {
        this.$refs[formName].resetFields();
      }
  },
  created(){
 
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
  .el-row {
    margin-bottom: 20px;
    &:last-child {
      margin-bottom: 0;
    }
  }
  .el-col {
    border-radius: 4px;
  }
  .bg-purple-dark {
    background: #99a9bf;
  }
  .bg-purple {
    background: #d3dce6;
  }
  .bg-purple-light {
    background: #e5e9f2;
  }
  .grid-content {
    border-radius: 4px;
    min-height: 36px;
  }
  .row-bg {
    padding: 10px 0;
    background-color: #f9fafc;
  }
</style>
