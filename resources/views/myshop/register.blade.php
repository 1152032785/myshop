<form action="{{url('do_register')}}" method="post">
<h4 align="center">注册</h4>
    <table border="1" align="center">
    @csrf
        <tr>
            <td>账号</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="password" name="pwd"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit"  value="注册">
            </td>
        </tr>
    </table>
</form>